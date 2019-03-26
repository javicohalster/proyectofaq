<table class="table table-responsive" id="faqs-table">
    <thead>
        <tr>
            <th>Question</th>
            <th>FaqCategory</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($faqs as $faq)
        <tr>
            <td>{!! $faq->question !!}</td>
            <td>{!! $faq->category != null ? $faq->category->name : ''  !!}</td>
            <td>
                {!! Form::open(['route' => ['faqs.destroy', $faq->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('faqs.show', [$faq->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('faqs.edit', [$faq->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>