@csrf
<div class="form-goup">
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('name_company') is-invalid @enderror" id="floatingInput" name="name_company" 
        value="{{ old('name_company') ?? $company->name_company}}">
        <label for="floatingInput">Name company</label>
        @error('name_company')
            <div class="invalid-feedback">{{ $errors -> first('name_company') }}</div>
        @enderror
    </div>
    <div class="form-control my-3">
        <label for="formFile" class="form-label" id="inputGroupFileAddon04">Image</label>
        <input class="form-control @error('image_company') is-invalid @enderror" 
        type="file" id="inputGroupFileAddon04" name="image_company">
        @error('image_company')
            <div class="invalid-feedback">{{ $errors->first('image_company') }}</div>
        @enderror
    </div>
</div>