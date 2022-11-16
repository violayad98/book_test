<?php
include_once 'film.php';

class Film_list
{

    public function __construct()
    {}

    public function get_filter($data = [])
    {
        include ('..\vendor\connect.php');
        $where = '';
        $order = '';
        if (! empty($data['film']) || ! empty($data['actor'])) {
            $where .= "WHERE ";
        }
        if (! empty($data['film'])) {
            $film_name = $data['film'];
            $where .= " films.name LIKE '%$film_name%'";
            if (! empty($data['actor'])) {
                $where .= " AND ";
            }
        }
        if (! empty($data['actor'])) {
            $actor = $data['actor'];
            $where .= "actors.name LIKE '%$actor%'";
        }
        if (! empty($data['sort'])) {
            $sort = $_POST['sort'];
            $order .= "ORDER BY ";
            switch ($sort) {
                case 'name_up':
                    $order .= "films.`name` ASC ";
                    break;
                case 'name_down':
                    $order .= "films.`name` DESC ";
                    break;
                case 'year':
                    $order .= "`year` ASC";
                    break;
            }
        }
        $sql = "SELECT films.* FROM `films` LEFT JOIN `films_actors` ON films_actors.film_id=films.id LEFT JOIN `actors` ON films_actors.actor_id=actors.id " . $where . " GROUP BY films.id " . $order;
        $films = mysqli_query($connect, $sql);
        $array = [];
        if (mysqli_num_rows($films) > 0) {
            
            while ($row = mysqli_fetch_assoc($films)) {
                $film = new Film($row['id']);
                $row['actors'] = $film->get_actors();
                $array[] = $row;
            }
        }
        return $array;
    }
}

?>