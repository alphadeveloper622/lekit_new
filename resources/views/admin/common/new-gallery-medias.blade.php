@foreach($medias as $media)
    <article class="article media-modal article-style-b" id="artilce_{{ $media->id }}" data-id="{{$media->id}}" data-order="{{$media->order}}" draggable="true" ondragstart="drag(event)"  ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="article-header"  draggable="false">
            <label class="imagecheck mb-4" draggable="false">
                <input name="imagecheck" type="checkbox" value="{{ $media->id }}" class="imagecheck-input" draggable="false">
                <figure class="imagecheck-figure" draggable="false">
                    <!-- @if($media->type == 'image' && @is_file_exists($media->image_variants['image_thumbnail'] , $media->storage))
                        <img src="{{ get_media($media->image_variants['image_thumbnail'], $media->storage) }}" alt="{{ $media->name }}"
                             class="imagecheck-image article-image">
                    @else
                        <img src="{{ static_asset('images/default/default-'.$media->type.'-180x120.png') }}" alt="{{ $media->name }}"
                             class="imagecheck-image article-image">
                    @endif
                    -->
                    <img src="{{ static_asset($media->storage.'/'.$media->name) }}" class="imagecheck-image article-image" draggable="false">
                </figure>
            </label>
        </div>
        <div class="article-details d-flex" draggable="false">
            <div class="d-block article-footer" draggable="false">
                <div class="d-flex" draggable="false">
                    <span class="article-title" draggable="false">{{ $media->name }}</span>
                    <!-- <span class="img-ext">.{{ $media->extension }}</span> -->
                </div>
                <div class="d-flex" draggable="false">
                    <span class="image-size" draggable="false">{{ formatBytes($media->size) }} </span>
                </div>
            </div>
        </div>
    </article>
@endforeach
