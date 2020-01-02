<?php
include_once "head.php";
include_once "connection.php";
?>
<h1 style="text-align:center">Project Crud.</h1>
<div class="container-fluid">
  <div class="form-row">
    <div class="col-md-9">
      <form action="get" method="">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="col-md-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="text-align:center;">
        ADD NEW PERSON
      </button>
    </div>
  </div><br>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phonenumber</th>
      <th scope="col">Gender</th>
      <th scope="col">year(s)</th>
      <th scope="col">Weight(KG)</th>
      <th scope="col">Married</th>
      <th scope="col">Working</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <?php
  $sql = 'SELECT * FROM person';
  $result = mysqli_query($conn, $sql);
  ?>


  <tbody>
    <?php
      if (mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
        {
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phonenumber']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['weight']; ?></td>
            <td><?php echo $row['married']; ?></td>
            <td><?php echo $row['working']; ?></td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>">
              EDIT
            </button>

            <button class="btn btn-danger">DELETE</button></td>
          </tr>

           <!-- Modal -->
          <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  Edit <?php echo $row['name']; ?>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div>
                  <form  action="edit.php" method="post">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $row['name']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['email']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pnumber:</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['phonenumber']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['gender']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">DOB:</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['dob']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Weight:</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['weight']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Workingin:</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['working']; ?>"/>
                    </div>
                  </div>
                  </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" name="edit">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <?php
        }
      } else
      {
        echo "No data";
      }

    ?>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Person</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="newuser.php">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Phonenumber</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="phonenumber" placeholder="Phonenumber">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">dateOfBirth</label>
            <div class="col-sm-9">
              <input type="date" name="dob" class="form-control" placeholder="DOB">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Weight</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="weight" placeholder="Weight">
          </div>
          </div>
         <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Married</label>
            <div class="col-sm-10">
              <input type="text" name="married"  class="form-control" placeholder="Married">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Workingin</label>
            <div class="col-sm-10">
              <input type="time" name="working" class="form-control" placeholder="Working">
            </div>
          </div>
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="M">
                  <label class="form-check-label" for="gridRadios1">
                    Male
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="F">
                  <label class="form-check-label" for="gridRadios2">
                    Female
                  </label>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">ADD Person</button>
          </div>
        </form>
      </div>
    </div>
  </div>





  <?php
  include_once "footer.php";
  ?>