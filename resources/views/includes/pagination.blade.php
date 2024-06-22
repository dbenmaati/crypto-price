          <!-- start paginator -->
            <style>
              .pagination-container {
                  text-align: center;
                  margin-top: 20px; 
              }
              .pagination {
                  display: inline-block;
                  padding-left: 0;
                  margin: 0;
                  border-radius: 4px;
                  list-style: none; 
              }

              .pagination li {
                  display: inline-block;
                  margin-right: 5px;
                  vertical-align: middle;
              }

              .pagination li a {
                  display: inline-block;
                  padding: 8px 12px;
                  line-height: 1.5;
                  text-decoration: none;
                  color: #337ab7;
                  background-color: #fff;
                  border: 1px solid #ddd;
                  cursor: pointer;
              }

              .pagination li.active a {
                  z-index: 2;
                  color: #fff;
                  background-color: #337ab7;
                  border-color: #337ab7;
                  cursor: default;
              }

              .pagination li.disabled a {
                  color: #777;
                  cursor: not-allowed;
                  background-color: #fff;
                  border-color: #ddd;
              }

              .pagination li.previous,
              .pagination li.next {
                  margin-right: 10px;
              }

              .pagination li span.paginate-item {
                  display: inline-block;
                  padding: 3px 8px;
              }

              .pagination li.previous span.paginate-item,
              .pagination li.next span.paginate-item {
                  border: 1px solid #ddd;
                  background-color: #fff;
              }

              .pagination li.previous.disabled span.paginate-item,
              .pagination li.next.disabled span.paginate-item {
                  color: #777;
                  cursor: not-allowed;
                  background-color: #fff;
                  border-color: #ddd;
              }

              .pagination li.previous a,
              .pagination li.next a {
                  color: #337ab7;
                  text-decoration: none;
              }

              .pagination li.previous a:hover,
              .pagination li.next a:hover,
              .pagination li.page a:hover {
                  color: #23527c;
                  background-color: #eee;
                  border-color: #ddd;
              }
            </style>
               
            <div class="pagination-container">
              <?php
              $start = $coins->currentPage() - 1;
              $end = $coins->currentPage() + 1;
              if ($start < 1) {
                  $start = 1;
                  $end += 1;
              }
              if ($end >= $coins->lastPage()) {
                  $end = $coins->lastPage();
              }
              ?>          
                                            
              @if ($coins->hasPages())
              <ul class="pagination">
                  <!-- Previous Button --> 
                  @if ($coins->onFirstPage())
                      <li class="disabled">
                          <a tabindex="0" role="button" aria-disabled="true" aria-label="Previous page" rel="prev">
                              <span class="paginate-item">
                                  <i class="fa-solid fa-arrow-left"></i>
                                  <span>&nbsp;&nbsp;PREV</span>
                              </span>
                          </a>
                      </li>
                  @else
                  <li>
                    <a href="{{ $coins->url($start) }}" tabindex="0" role="button" aria-disabled="false" aria-label="Previous page" rel="prev">
                              <span class="paginate-item">
                                  <i class="fa-solid fa-arrow-left"></i>
                                  <span>&nbsp;&nbsp;PREV</span>
                              </span>
                          </a>
                      </li>
                  @endif
                <!-- Pagination Middle --> 
                  @if($start > 1)
                      <li class="page">
                          <a role="button" href="{{ $coins->url(1) }}" tabindex="0" aria-label="Page {{1}}">{{1}}</a>
                      </li>
                  @endif
                      @for ($i = $start; $i <= $end; $i++)
                        <li class="page {{ ($coins->currentPage() == $i) ? ' active' : '' }}">
                            <a role="button" href="{{ $coins->url($i) }}" tabindex="0" aria-label="Page {{$i}}">{{$i}}</a>
                        </li>
                      @endfor
                <!-- Show Last Page --> 	
                  @if($end < $coins->lastPage())
                    <li class="page">
                        <a role="button" href="{{ $coins->url($coins->lastPage()) }}" tabindex="0" aria-label="Page {{$coins->lastPage()}}">{{$coins->lastPage()}}</a>
                    </li>
                  @endif
                <!-- Next Button --> 
                @if ($coins->onLastPage())
                  <li class="disabled">
                      <a tabindex="0" role="button" aria-disabled="true" aria-label="Next page" rel="next">
                        <span class="paginate-item"><span>NEXT</span>&nbsp;&nbsp; <i class="fa-solid fa-arrow-right"></i> </span>
                      </a>
                  </li>
                @else
                  <li>
                    <a href="{{ $coins->url($end) }}" tabindex="0" role="button" aria-disabled="false" aria-label="Next page" rel="next">
                      <span class="paginate-item"> <span>NEXT</span>&nbsp;&nbsp; <i class="fa-solid fa-arrow-right"></i> </span>
                    </a>
                  </li>
                  @endif
                
              </ul>
              @endif
            </div>
            <!-- end paginator -->  