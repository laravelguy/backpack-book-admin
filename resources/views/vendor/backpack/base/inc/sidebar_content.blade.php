<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ backpack_url('author') }}'><i class='fa fa-user'></i> <span>Authors</span></a></li>
<li><a href='{{ backpack_url('book') }}'><i class='fa fa-book'></i> <span>Books</span></a></li>
<li><a href='{{ backpack_url('subject') }}'><i class='fa fa-tag'></i> <span>Subjects</span></a></li>
<li><a href='{{ backpack_url('category') }}'><i class='fa fa-list-alt'></i> <span>Categories</span></a></li>
<li><a href='{{ backpack_url('subcategory') }}'><i class='fa fa-list-alt'></i> <span>Sub-Categories</span></a></li>