<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class InstallController extends Controller
{
    public function showForm()
    {
        // Check if the application is already installed
        if (env('INSTALL') == 1) {
            return view('includes.install.error');
        }

        return view('includes.install.install');
    }



    public function install(Request $request)
    {
        ///////// SECURITY ////////////
        if (env('INSTALL') == 1) {
            return view('includes.install.error');
        }


        ///////// INPUT VALIDATTION ////////////
        $request->validate([
            'db_host' => 'required',
            'db_port' => 'required|integer',
            'db_database' => 'required',
            'db_username' => 'required',
            'db_password' => 'nullable',

            'admin_email' => 'required',
            'admin_password' => 'required',

        ]);

        
        
        ///////// DB CONNECTION VERIFICATTION ////////////
        try {
            Config::set('database.connections.mysql.host', $request->input('db_host'));
            Config::set('database.connections.mysql.port', $request->input('db_port'));
            Config::set('database.connections.mysql.database', $request->input('db_database'));
            Config::set('database.connections.mysql.username', $request->input('db_username'));
            Config::set('database.connections.mysql.password', $request->input('db_password'));

            DB::reconnect();
            DB::select('SELECT 1'); // Simple query to test the connection

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Database connection failed <br> check your db credentials');
        }


        ///////// UPDATE .ENV ////////////
        try {
            File::copy(base_path('.env.example'), base_path('.env'));
        
            // Update .env file
            $envFile = base_path('.env');
            $envContent = File::get($envFile);
                
            $envContent .= "\nAPP_URL=" . url('/');

            $envContent .= "\n";
            $envContent .= "\nDB_CONNECTION=mysql";
            $envContent .= "\nDB_HOST=" . $request->input('db_host');
            $envContent .= "\nDB_PORT=" . $request->input('db_port');
            $envContent .= "\nDB_DATABASE=" . $request->input('db_database');
            $envContent .= "\nDB_USERNAME=" . $request->input('db_username');
            $envContent .= "\nDB_PASSWORD=" . $request->input('db_password');
            $envContent .= "\n";
                
        
            // Save the updated content back to the .env file
            File::put($envFile, $envContent);
        
        } catch (Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'Please check your hosting configuration <br> no write permissions');
        }


        ///////// UPDATE DTABASE DATA ////////////
        try {
            $this->importSql();
        } catch (Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'Database Import Failed <br> Please try again.');
        }


        ///////// CREATE ADMIN ////////////

        try {
            $user = User::create([
                'name' => "Admin",
                'email' => $request->admin_email,
                'password' => Hash::make($request->admin_password),
            ]);
        } catch (Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'Install failed for some reasons <br> please try again');
        }
        

        ///////// UPDATE .ENV SET INSTALL VARIABLE////////////
        try {
            $envContent .= "\nINSTALL=1\n";
            File::put($envFile, $envContent);
        } catch (Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'Install failed for some reasons <br> please try again');
        }


        return redirect('/')->with('success', 'Installation completed successfully.');
    }


    public function importSql()
    {
        // Path to your .sql file
        $sqlFile = base_path('db.sql');

        // Check if the file exists
        if (!File::exists($sqlFile)) {
            return false;
        }

        $sqlContent = File::get($sqlFile);
        $sqlQueries = array_filter(array_map('trim', explode(';', $sqlContent)));

        // Execute each query
        foreach ($sqlQueries as $query) {
            try {
                DB::statement($query);
            } catch (\Exception $e) {
                return false;
            }
        }

        return true;
    }

}
