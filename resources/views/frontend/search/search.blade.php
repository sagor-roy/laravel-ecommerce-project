
<div class="hero__search">
    <div class="hero__search__form">
        <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="hero__search__categories">
                All Categories
                <span class="arrow_carrot-down"></span>
            </div>
            <input type="text" name="slug" id="employee_search" placeholder="What do yo u need?" autocomplete="off">
            <button type="submit" class="site-btn">SEARCH</button>
        </form>
    </div>
</div>
<div id="productStatus">
</div>


