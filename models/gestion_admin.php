<?php
           
    if (isset($_GET['approuved']) AND !empty($_GET['approuved'])) {
        $approuved = (int) $_GET['approuved'];

        $req1 = $db->prepare('UPDATE commentarys SET approuved = 1 WHERE id = ?');
        $req1->execute(array($approuved));
    }
    if (isset($_GET['delete']) AND !empty($_GET['delete'])) {
        $delete = (int) $_GET['delete'];

        $req1 = $db->prepare('DELETE FROM commentarys WHERE id = ?');
        $req1->execute(array($delete));
    }
    