<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD School of Whales - Client List Read</title>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
  
    
</head>
<body>
    <div class="container">
    <h3>Email Lists</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Client First Name</th>
                    <th>Client Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($client as $row):?>
                <tr>
                    <td><?= $row->client_firstname;?></td>
                    <td><?= $row->client_lastname;?></td>
                    <td><?= $row->client_email;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->client_id;?>" data-firstname="<?= $row->client_firstname;?>" data-lastname="<?= $row->client_lastname;?>" data-email="<?= $row->client_email;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->client_id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
 
    </div>
     
    <!-- Modal Add Product-->
    <form action="/client/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Client First Name</label>
                    <input type="text" class="form-control" name="client_firstname" placeholder="Client First Name">
                    <div class="invalid-feedback">Client First Name is required</div>
                </div>
                 
                <div class="form-group">
                    <label>Client Last Name</label>
                    <input type="text" class="form-control" name="client_lastname" placeholder="Client Last Name">
                    <div class="invalid-feedback">Client Last Name is required</div>
                </div>
 
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="client_email" placeholder="Client Email">
                    <div class="invalid-feedback">Client Email is required</div>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->
 
    <!-- Modal Edit Product-->
    <form action="/client/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Client First Name</label>
                    <input type="text" class="form-control client_firstname" name="client_firstname" placeholder="Client First Name">
                </div>
                 
                <div class="form-group">
                    <label>Client Last Name</label>
                    <input type="text" class="form-control client_lastname" name="client_lastname" placeholder="Client Last Name">
                </div>
 
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control client_email" name="client_email" placeholder="Client Email">
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="client_id" class="client_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="/client/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this client?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="client_id" class="clientID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function(){
 
        // get Edit Client
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const client_id = $(this).data('id');
            const client_firstname = $(this).data('firstname');
            const client_lastname = $(this).data('lastname');
            const client_email = $(this).data('email');
            // Set data to Form Edit
            $('.client_id').val(client_id);
            $('.client_firstname').val(client_firstname);
            $('.client_lastname').val(client_lastname);
            $('.client_email').val(client_email).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.clientID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>
</body>
</html>