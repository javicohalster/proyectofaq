<li class="{{ Request::is('faqCategories*') ? 'active' : '' }}">
    <a href="{!! route('faqCategories.index') !!}"><i class="fa fa-edit"></i><span>Faq Categories</span></a>
</li>
<li class="{{ Request::is('faqs*') ? 'active' : '' }}">
    <a href="{!! route('faqs.index') !!}"><i class="fa fa-edit"></i><span>Faqs</span></a>
</li>

