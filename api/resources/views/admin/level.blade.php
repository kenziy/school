@include('header');
@include('nav');
    <div class="main-content levelPage">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Levels list</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addLevel">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="levelList">
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addLevel" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Create Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Level name</label>
                        <input type="text" name="" class="form-control title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn au-btn--blue submit">Create</button>
                </div>
            </div>
        </div>
    </div>
@include('footer');