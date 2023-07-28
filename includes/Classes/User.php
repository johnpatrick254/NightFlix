<?php
declare(strict_types=1);

class User
{
    private PDO $conn;
    function __construct(PDO $con)
    {
        $this->conn = $con;
    }

    public function register(string $fname, string $sname, string $uname, string $email, string $password)
    {
        $password = hash('sha512', $password);
        try {
            $query = "INSERT INTO users (first_name,last_name,username,email,password) VALUES(:first_name,:last_name,:username,:email,:password);";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':first_name', $fname);
            $stmt->bindParam(':last_name', $sname);
            $stmt->bindParam(':username', $uname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            if ($stmt->execute()) {
                return true;
            }
            ;
            $stmt->closeCursor();

        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                echo "<span class='err-msg'>email $email already exists</span>";
            } else {
                echo "PDO Exception occurred: " . $e->getCode();
            }
        }
    }

    public function login(string $email, string $password)
    {

        try { {
                $password = hash('sha512', $password);
                $query = "SELECT EXISTS(SELECT username FROM users WHERE email=:email AND password=:password) AS user_exists;";

                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                if ($result['user_exists'] == 0) {
                    echo "<span class='err-msg'>wrong user or password</span>";
                } else {
                    return true;
                }
            }
        } catch (PDOException $e) {
            echo "PDO Exception occurred: " . $e->getCode();

        }
    }

}