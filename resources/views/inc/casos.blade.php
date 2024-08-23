<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
</script>


<section class="casos-list">
    
    <div class="container">
        <div class="row" data-masonry='{"percentPosition": true }'>
            
            <div class="col-12 col-lg-6 casos-text">
                <h2 class="title-conocernos">
                    {{__("Meet us")}}
                </h2>
                <p class="info-conocernos">
                    {{__("Through what we do")}}
                </p>
            </div>
            @foreach ($projectTypes as $pt)
                <div class="col-12 col-lg-6 caso-unidad">
                    <a href="{{ route('detailCases',[App\Models\Idiom::where('id',$pt->idiom_id)->first()->acronym,$pt->project->id]) }}"
                        style="text-decoration: none;color:black">
                        <div class="image-case">
                            <img class="img-fluid" src="{{ $pt->project->photo }}" >
                        </div>
                        <h3>
                            {{$pt->projectType}}
                        </h3>
                        <p>
                            {{$pt->project->name}}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>