@csrf
<div class="form-goup">
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('name_cust') is-invalid @enderror" 
        id="floatingInput" placeholder="Name" name="name_cust" value="{{ old('name_cust') ?? $customer->name_cust }}">
        <label for="floatingInput">Name</label>
        @error('name_cust')
            <div class="invalid-feedback">{{ $errors -> first('name_cust') }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" 
        id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('name_cust') ?? $customer->email }}">
        <label for="floatingInput">Email</label>
        @error('email')
            <div class="invalid-feedback">{{ $errors -> first('email') }}</div>
        @enderror
    </div>
    
    <div class="form-floating mb-3">
        <input type="number" class="form-control @error('age') is-invalid @enderror" 
        id="floatingInput" placeholder="name@example.com" name="age" value="{{ old('name_cust') ?? $customer->age }}">
        <label for="floatingInput">Age</label>
        @error('age')
            <div class="invalid-feedback">Insert the name</div>
        @enderror
    </div>
    <div class="form-floating">
        <select class="form-select @error('status') is-invalid @enderror" 
        id="floatingSelect" aria-label="Floating label select example" name="status">
        @foreach ($customer->getStatusOption() as $key => $value )
            <option value="{{ $key }}" {{ $customer->status == $value ? 'selected' : '' }}>{{$value}}</option>
        @endforeach
        </select>
        <label for="floatingSelect">Statut</label>
        @error('status')
            <div class="invalid-feedback">{{ $errors -> first('status') }}</div>
        @enderror
    </div>
    <div class="form-floating my-3">
        <select class="form-select @error('company_id') is-invalid @enderror" 
        id="floatingSelect" aria-label="Floating label select example" name="company_id">
            @foreach ($companies as $company )
                <option value="{{ $company->id }}" {{ $customer->company_id == $company->id ? 'selected' : '' }}>{{$company->name_company}}</option>
            @endforeach
        </select>
        <label for="floatingSelect">Company</label>
        @error('company_id')
            <div class="invalid-feedback">{{ $errors -> first('company_id') }}</div>
        @enderror
    </div>
    <div class="form-control my-3">
        <label for="formFile" class="form-label" id="inputGroupFileAddon04">Profile :</label>
        <input class="form-control @error('profile_customer') is-invalid @enderror" 
        type="file" id="inputGroupFileAddon04" name="profile_customer">
        @error('profile_customer')
            <div class="invalid-feedback">{{ $errors->first('profile_customer') }}</div>
        @enderror
    </div>
</div>