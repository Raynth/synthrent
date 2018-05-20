				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter op merk</h3>
						<ul class="list-links">
							@foreach($marks as $mark)
								<li><a href="{{ route('merk.show', str_slug($mark->naam)) }}">{{ $mark->naam }}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Top 5 Verhuurde Producten</h3>
						@if($top5->count() > 0)
							@foreach($top5 as $item)
								<!-- widget product -->
								<div class="product product-widget">
									<div class="product-thumb">
										<img src="{{ asset('storage/cover_images/'.$item->product->foto) }}" alt="">
									</div>
									<div class="product-body">
										<h2 class="product-name"><a href="#">{{ $item->product->merk->naam }} {{ $item->product->naam }}</a></h2>
										<h3 class="product-price">&euro; {{ number_format($item->product->huurprijs, 2, ',', '.') }}</h3>
									</div>
								</div>
								<!-- /widget product -->
							@endforeach
						@else
							<p>Nog geen producten verhuurd!</p>
						@endif
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->