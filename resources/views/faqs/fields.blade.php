<!-- Question Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Faqcategory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faqcategory_id', 'Faqcategory Id:') !!}
    <select name="faqcategory_id" id="faqcategory_id" class="form-control">
        @foreach ($faqcategories as $faqCat)
            <option value="{{$faqCat->id}}" 
            {{ isset($faq->faqcategory_id) && $faq->faqcategory_id ==  $faqCat->id ? 'selected' : ''}}>
                {{$faqCat->name}}
            </option>
        @endforeach
    </select>
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('faqs.index') !!}" class="btn btn-default">Cancel</a>
</div>
