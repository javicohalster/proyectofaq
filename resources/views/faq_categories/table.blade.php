<table class="table table-responsive" id="faqCategories-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($faqCategories as $faqCategory)
        <tr>
            <td>{!! $faqCategory->name !!}</td>
            <td>
                {!! Form::open(['route' => ['faqCategories.destroy', $faqCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('faqCategories.show', [$faqCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('faqCategories.edit', [$faqCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>