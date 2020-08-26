@extends('master-admin')
@section('title', 'Admin Dashboard')
@section('content')
<br>
        <h3 class="agileinfo_sign">Admin Panel</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">
        <div class="list-group-item">
            <div class="row-action-primary">
              <i class="mdi-social-person"></i>

            </div>
            <div class="row-content">
              <div class="action-secondary"> <i class="mdi-social-info"></i>

              </div>
              <h4 class="list-group-item-heading">Manage Users</h4>
              <a href="/admin/users" class="btn btn-default btn-raised">Users Database</a>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
          <div class="list-group-item">
            <div class="row-action-primary">
              <i class="mdi-social-group"></i>
            </div>
            <div class="row-content">
              <div class="action-secondary">
                <i class="mdi-material-info"></i>

              </div>
              <h4 class="list-group-item-heading">View Roles</h4>
              <a href="/admin/roles" class="btn btn-default btn-raised">All Roles</a>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
          <div class="list-group-item">
            <div class="row-action-primary">
              <i class="mdi-social-group"></i>
            </div>
            <div class="row-content">
              <div class="action-secondary">
                <i class="mdi-material-info"></i>

              </div>
              <h4 class="list-group-item-heading">Manage Products</h4>
              <a href="/admin/posts" class="btn btn-default btn-raised">All Products</a>
              <a href="/admin/posts/create" class="btn btn-primary btn-raised">Add A New Product</a>
            </div>
          </div>
          <div class="list-group-separator">
          </div>
          <div class="list-group-item">
            <div class="row-action-primary">
              <i class="mdi-social-group"></i>
            </div>
            <div class="row-content">
              <div class="action-secondary">
                <i class="mdi-material-info"></i>

              </div>
              <h4 class="list-group-item-heading">Manage Product Categories</h4>
              <a href="/admin/categories" class="btn btn-default btn-raised">All Categories</a>
              <a href="/admin/categories/create" class="btn btn-primary btn-raised">Add New Category</a>
            </div>
          </div>
          <div class="list-group-separator">  </div>

      </div>

    </div>

  </div>

</div>


@endsection
