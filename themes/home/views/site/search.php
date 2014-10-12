<div class="content clearfix">
				
			
				<!--sidebar-->
				<aside class="left-sidebar">
					<article class="refine-search-results">
						<h2>Refine search results</h2>
						<dl>
							<!--Price (per night)-->
							<dt>Price (per night)</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch1" name="price" />
									<label for="ch1">0 - 49 $</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch2" name="price" />
									<label for="ch2">50 - 99 $</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch3" name="price" />
									<label for="ch3">100 -149 $</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch4" name="price" />
									<label for="ch4">150 - 199 $</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch5" name="price" />
									<label for="ch5">200 $ +</label>
								</div>
							</dd>
							<!--//Price (per night)-->
							
							<!--Accommodation type-->
							<dt>Accommodation type</dt>
							<dd>
								<div class="checkbox">
									<input type="checkbox" id="ch6" name="accommodation" />
									<label for="ch6">Hotel</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch7" name="accommodation" />
									<label for="ch7">Hostel</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch8" name="accommodation" />
									<label for="ch8">Apart Hotel</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch9" name="accommodation" />
									<label for="ch9">Guest House</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch10" name="accommodation" />
									<label for="ch10">Apartment</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch11" name="accommodation" />
									<label for="ch11">Bed &amp; Breakfast</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch12" name="accommodation" />
									<label for="ch12">Residence</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch13" name="accommodation" />
									<label for="ch13">Farm stay</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="ch14" name="accommodation" />
									<label for="ch14">All-inclusive resort</label>
								</div>
							</dd>
							<!--//Accommodation type-->
							
							<!--Star rating-->
							<dt>Star rating</dt>
							<dd>
								<span class="stars-info">3 or more</span>
								<div id="star" data-rating="3"></div>
							</dd>
							<!--//Star rating-->
							
							<!--User rating-->
							<dt>User rating</dt>
							<dd>
								<div id="slider"></div>
								<span class="min">0</span><span class="max">10</span>
							</dd>
							<!--//User rating-->
							
												</dl>
					</article>
				</aside>
				<!--//sidebar-->
			
				<!--three-fourth content-->
					<section class="three-fourth">
						<div class="sort-by">
							<h3>Search Result</h3>
							
							
							<ul class="view-type">
								<li class="grid-view"><a href="#" title="grid view">grid view</a></li>
								<li class="list-view"><a href="#" title="list view">list view</a></li>
								
							</ul>
						</div>
						
						<div class="deals clearfix">
                        
                        
						       <?php $this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$fech_result,
									'itemView'=>'_school',
									'id'=>'featured_company', 
									'htmlOptions'=>array('class'=>'col-md-12','style'=>'min-width:300px;'),
									'ajaxUpdate'=>true, 
									'summaryText'=>false,
									'pager' => array(
										'header' => '',
										'cssFile' =>'',
										'firstPageLabel'=>'First',
										'lastPageLabel'=>'Last',
										'prevPageLabel'=>'« Prev',
										'nextPageLabel'=>'Next »',
										),
								)); ?>
							<!--
							<div class="bottom-nav">
								<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
								<div class="pager">
									<span><a href="#">First page</a></span>
									<span><a href="#">&lt;</a></span>
									<span class="current">1</span>
									<span><a href="#">2</a></span>
									<span><a href="#">3</a></span>
									<span><a href="#">4</a></span>
									<span><a href="#">5</a></span>
									<span><a href="#">6</a></span>
									<span><a href="#">7</a></span>
									<span><a href="#">8</a></span>
									<span><a href="#">&gt;</a></span>
									<span><a href="#">Last page</a></span>
								</div>
							</div>-->
						</div>
					</section>
				<!--//three-fourth content-->
			</div>