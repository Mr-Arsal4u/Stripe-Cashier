<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<form action="{{ route('plans.save') }}" method="POST" >
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Plan Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Amount</label>
    <input type="number" class="form-control"  name="amount" id="exampleInputPassword1" placeholder="Amount">
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Currency</label>
    <input type="text" class="form-control" name="currency" id="exampleInputPassword1" placeholder="Currency">
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Interval count</label>
    <input type="number" class="form-control" name="interval_count" id="exampleInputPassword1" placeholder="Interval Count">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Billing Period</label>
    <select class="form-control" name="billing_period">
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
        <option value="year">Year</option>
    </select>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
