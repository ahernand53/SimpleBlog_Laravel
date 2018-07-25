<div class="form-group">
    {{Form::label('name','Nombre de la etiqueta')}}
    {{Form::text('name',null,['class'=>'form-control','id'=>'name'])}}
</div>
<div class="form-group">
    {{Form::label('slug','URL Amigable')}}
    {{Form::text('slug',null,['class'=>'form-control','id'=>'slug'])}}
</div>
<div class="form-group">
    {{ Form::button('Guardar <i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-lg btn-block btn-outline-primary'] )  }}
</div>

@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#name, #slug").stringToSlug({
            callback: function(text){
                $("#slug").val(text);
            }
        });
    });
</script>
@endsection