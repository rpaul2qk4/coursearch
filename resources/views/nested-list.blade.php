<style>
.list-group > .list-group {
  display: none;
  margin-bottom: 0;
}
.list-group-item:focus-within + .list-group {
  display: block;
}

.list-group > .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group  > .list-group > .list-group-item {
  padding-left: 2.5rem;
}
</style>

<div class="list-group">
  <a href="#" class="list-group-item">Item 1</a>
  <div class="list-group">
    <a href="#" class="list-group-item">Item 1.1</a>
    <a href="#" class="list-group-item">Item 1.2</a>
    <a href="#" class="list-group-item">Item 1.3</a>
  </div>
  
  <a href="#" class="list-group-item">Item 2</a>
  <div class="list-group">
    <a href="#" class="list-group-item">Item 2.1</a>
    <a href="#" class="list-group-item">Item 2.2</a>
    <a href="#" class="list-group-item">Item 2.3</a>
  </div>
  
  
  <a href="#" class="list-group-item">Item 3</a>
  <div class="list-group">
    <a href="#" class="list-group-item">Item 3.1</a>
    <a href="#" class="list-group-item">Item 3.2</a>
    <a href="#" class="list-group-item">Item 3.3</a>
  </div>
</div>