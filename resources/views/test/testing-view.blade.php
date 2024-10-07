<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List and Grid View with Bootstrap</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .item {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2>List View</h2>
    <div class="list-view">
      <div class="item">Apple (AP)</div>
      <div class="item">Banana (BN)</div>
      <div class="item">Cherry (CH)</div>
      <div class="item">Date (DT)</div>
    </div>
    <h2>Grid View</h2>
    <div class="row grid-view">
      <div class="col-md-3">
        <div class="item">Apple (AP)</div>
      </div>
      <div class="col-md-3">
        <div class="item">Banana (BN)</div>
      </div>
      <div class="col-md-3">
        <div class="item">Cherry (CH)</div>
      </div>
      <div class="col-md-3">
        <div class="item">Date (DT)</div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
