@props(['blog'])
<div class="card unicode" style="background-color:#FDBF60">
            <img
              src="{{ asset('storage/'.$blog->thumbnail) }}"
              class="card-img-top"
              alt="..."
              width="300" height="320"
            />
            <div class="card-body">
              <h3 class="card-title">{{$blog->title}}</h3>
              <p class="fs-6 text-secondary">
                <a href="/?username={{$blog->author->username}}">
                  {{$blog->author->name}}
                </a>
                <span> - {{$blog->created_at->diffForHumans()}}</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary">
                  <a href="/?category={{$blog->category?->slug}}" class="text-white">
                    {{$blog->category?->name}}
                  </a>
                </span>
              </div>
              <p class="card-text">
                {{$blog->intro}}
              </p>
              <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
            </div>
          </div>