<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Company</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer ) 
        <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td> <a href="/customer/{{ $customer->id }}">{{ $customer->name_cust }}</a> </td>
            <td>{{ $customer->age }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->status }}</td>
            <td>{{ $customer->company->name_company }}</td>
        </tr>
      @endforeach
    </tbody>
</table>
<a href="customer/create" class="btn btn-outline-info"> Create a new customer </a>