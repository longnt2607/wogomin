<!-- <?php
        $mang = json_decode($data["edit_rc"]);
        foreach ($mang as $m) {
            echo $m->id;
            echo $m->roomName;
            echo $m->dateCreated;
        }
        ?> -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Id</div>
                            <input type="text" id="username3" name="username3" disabled class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Email</div>
                            <input type="email" id="email3" name="email3" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Password</div>
                            <input type="password" id="password3" name="password3" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-asterisk"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancel
                                        </button>
                                    </div>
                </form>
            </div>
        </div>
    </div>
</div>