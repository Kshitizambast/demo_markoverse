    <div class="category-section" id="categorySection">
        <h1 class="position-absolute">Trending categories on markoverse</h1>
        <div class="sub-category-section pt-5">
            <div class="category-tab-box d-flex justify-content-around">


                <!-- Food section -->
                <div class="tabs-section">
                    <a type="buttton" href="/shops" class="lazy btn sub-category-tab-header sub-category-tab-header-food">
                        <span class="p-4">Food & Drinks</span>
                        <span class="tab-header-thumb tab-thumb-food"></span>
                    </a>

                    @foreach($categories as $category)
                    @if($category->super_categories_id == 2)

                    <a type="buttton" href="/shops" class="lazy btn sub-category-tab sub-category-tab-{{$category->subcategory_name}}">
                        <span class="p-3">{{$category->subcategory_name}}</span>
                        <span class="tab-thumb tab-thumb-{{$category->subcategory_name}}"></span>
                    </a>

                    @endif
                    @endforeach

                </div>


                <!-- Fashion section -->
                <div class="tabs-section">
                    <a type="buttton" href="/shops" class="lazy btn sub-category-tab-header sub-category-tab-header-fashion">
                        <span class="p-4">Fashion</span>
                        <span class="tab-header-thumb tab-thumb-fashion"></span>
                    </a>

                    @foreach($categories as $category)
                    @if($category->super_categories_id == 1)

                    <a type="buttton" href="/shops" class="lazy btn sub-category-tab sub-category-tab-{{$category->subcategory_name}}">
                        <span class="p-3">{{$category->subcategory_name}}</span>
                        <span class="tab-thumb tab-thumb-{{$category->subcategory_name}}"></span>
                    </a>
                    @endif
                    @endforeach
                </div>



                <!-- Service section -->
                <div class="tabs-section">
                    <a type="buttton" href="/shops" class="lazy btn sub-category-tab-header sub-category-tab-header-service">
                        <span class="p-4">Services</span>
                        <span class="tab-header-thumb tab-thumb-service"></span>
                    </a>

                    @foreach($categories as $category)
                    @if($category->super_categories_id == 3)
                    <a type="buttton" href="/shops" class="lazy btn sub-category-tab sub-category-tab-{{$category->subcategory_name}}">
                        <span class="p-3">{{$category->subcategory_name}}</span>
                        <span class="tab-thumb tab-thumb-{{$category->subcategory_name}}"></span>
                    </a>
                    @endif
                    @endforeach
                </div>


            </div>
        </div>
    </div>
