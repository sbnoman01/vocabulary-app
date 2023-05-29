<?php 
require_once 'partials/header.php';
require_once 'functions.php';

$user_id = $_SESSION['id'] ?? 0;
if( empty($user_id) || $user_id == 0 ){
  header("Location: login.php?rescode=7");
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addNewWordModal">Add New Word</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="partials/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper bg-white mt-5 p-5 rounded">
                <div class="filter-wrapper">
                    <div class="row justify-content-between">
                    <p><?php echo getResponseMessage($_GET['rescode']??0); ?></p>
                        <div class="col-lg-4">
                            <div class="alphabets">
                                <select class="form-select" id="charFilter" aria-label="Default select example">
                                    <option value="all">All Words</option>
                                    <option value="A">A#</option>
                                    <option value="B">B#</option>
                                    <option value="C">C#</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                              <form class="d-flex" role="search">
                              <input class="form-control me-2" type="search" name="searchString" placeholder="Search" aria-label="Search" value="<?= $_GET['searchString']??''  ?>">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <table id="wordsTable" class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Word</th>
                            <th scope="col">Defination</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count_list = 0;
                        $searchString = $_GET['searchString']??null;
                        $data = getWordList($user_id, $searchString);
                        foreach( $data as $word){ $count_list++?>
                        <tr>
                            <th scope="row"><?php echo $count_list ?></th>
                            <td><?= $word['word'] ?></td>
                            <td><?= $word['meaning'] ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewWordModal" tabindex="-1" aria-labelledby="addNewWordModalLabel" aria-hidden="true"  data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addNewWordModalLabel">Add New Word</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="inc/controller.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Word:</label>
            <input type="text" class="form-control" id="recipient-name" name="_word">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Full Form:</label>
            <textarea class="form-control" id="message-text" name="_meaning"></textarea>
          </div>
          <input type="hidden" name="action" value="addword">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Add Word">
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<?php require_once 'partials/footer.php' ?>