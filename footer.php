<?php
?>

</div>

    <footer style="margin-top: 0.8em;">

        <nav style="
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1em 2em;
  background: linear-gradient(90deg, #1e1e2fff, #2a2a3dff);
  font-family: 'Segoe UI', sans-serif;
  color: white;
  flex-wrap: wrap;
">
            <!-- Logo -->
            <?php if (!isset($_SESSION['user'])) { ?>
                <a href="./signUp.php" style="color: white; text-decoration: none; padding: 0.5em 0.3em;">...</a>
            <?php } else { ?>
                <a href="./signIn.php" style="
    background-color: #bf00207e;
    color: white;
    text-decoration: none;
    padding: 0.6em 1.2em;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.3s;">
                    Désinscription
                </a> <?php }  ?>


        </nav>


    </footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>