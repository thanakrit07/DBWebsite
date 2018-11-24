    <div class="container" style="margin-top: 20vh ;margin-left: 30vw;margin-right: 20vw">
        <div class="row">
            <img src="/../icon/profile.svg" class="rounded d-block" alt="..." style="width: 200px; height: 200px; background-color: #000000">
            <form style="margin-top: 3vh;margin-left: 3vw; width : 40vw">
                <div class="form-row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-4 offset-sm-1">
                        <div type="text" readonly class="form-control-plaintext" id="Name"><?php echo $Fname."  ".$Lname?></div>
                    </div>
                </div>

                <div class="form-row">
                    <label for="Telephone" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-5 offset-sm-1">
                        <div type="text" readonly class="form-control-plaintext" id="Telephone"> <?php echo $tel?> </div>
                    </div>
                </div>

                <div class="form-row">
                    <label for="Religion" class="col-sm-2 col-form-label">Religion</label>
                    <div class="col-sm-5 offset-sm-1">
                        <div type="text" readonly class="form-control-plaintext" id="Religion"><?php echo $tel?></div>
                    </div>
                </div>

                <div class="form-row">
                    <label for="Allergy" class="col-sm-2 col-form-label">Allergy</label>
                    <div class="col-sm-5 offset-sm-1">
                        <div type="text" readonly class="form-control-plaintext" id="Allergy"><?php echo $tel?></div>
                    </div>
                </div>
            </form>
        </div>
        <button class="btn btn-primary" type="submit" style="margin-top: 5vh;font-size: 20px">Edit</button>
    </div>