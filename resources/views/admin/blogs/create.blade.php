<x-admin-layout>
    <h3 class="my-3 text-center">Recipes Create Form</h13>
        <x-card-wrapper>
            <form
                enctype="multipart/form-data"
                action="/admin/blogs/store"
                method="POST"
                class="center unicode"
            >
                @csrf
                    <x-form.input name="title" />
                    <x-form.input name="slug" />
                    <x-form.input name="intro" />
                    <x-form.textarea name="body" />
                    <x-form.input name="thumbnail" type="file" />
                    
                    <div class="mb-3">
                        <x-form.label name="category"/>
                        <select 
                            name="category_id" 
                            id="category"
                            class="form-control"
                        >
                            @foreach ($categories as $category)
                                <option {{$category->id == old('category_id') ? 'selected':''}} value="{{$category->id}}"> 
                                    {{$category->name}} 
                                </option>
                            @endforeach
                        </select>
                        <x-error name="category_id" />
                    </div>
                    <div class="d-flex justify-content-start mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </x-card-wrapper>
</x-admin-layout>