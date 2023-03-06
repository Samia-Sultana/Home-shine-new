@extends('masterUser')
@section('gallery')


<section class="portfolio gallery">
    <div class="container">
        <div class="top-side">
            <h4 class="title">Gallery</h4>
            <h2>PORTFOLIO</h2>
        </div>

        <div class="filters">
            <ul>
                <?php
                $catagories = App\Models\Catagory::all();
                ?>
                <li class="active" data-filter="*">All</li>/
                @foreach($catagories as $catagory)
                <li data-filter=".{{$catagory->catagoryName}}">{{$catagory->catagoryName}}</li>/
                @endforeach
            </ul>
        </div>


        <div class="filters-content">
            <div class="row grid">
                @if($photos)
                @foreach($photos as $photo)
                <?php
                $catagoryDetail = App\Models\Catagory::find($photo->catagory_id);
                ?>
                <div class="col-sm-4 all {{$catagoryDetail->catagoryName}}">
                    <div class="item">
                        <img src="{{url('photos/'.$photo->image) }}" alt="Work 1">
                        <div class="p-inner">
                            <h5>Work 1</h5>
                            <div class="cat">{{$catagoryDetail->catagoryName}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    
/*-----------------------------------
	  isotop gallery
	  -------------------------------------*/
	  $('.filters ul li').click(function(){
		$('.filters ul li').removeClass('active');
		$(this).addClass('active');
		
		var data = $(this).attr('data-filter');
		$grid.isotope({
		  filter: data
		})
	  });
	  
	  var $grid = $(".grid").isotope({
		itemSelector: ".all",
		percentPosition: true,
		masonry: {
		  columnWidth: ".all"
		}
	  })

</script>

@endsection