<?php
    include "../././classes/connect.php";
class reports extends database
{
    public function generate_report()
    {
        $start_date = date('Y-m-d', strtotime('-14 days'));
        $end_date = date('Y-m-d');

        $sql = $this->connect()->prepare("SELECT DATE(date) as date, COUNT(*) as total_bookings,
         SUM(amount) as total_revenue 
                FROM bookings 
                WHERE date BETWEEN '$start_date' AND '$end_date'
                GROUP BY DATE(date)");
        $sql->execute();

        $dates = array();
        $bookings = array();
        $revenues = array();

        if ($sql->rowCount() > 0) {
           foreach($sql as $row){
                $dates[] = $row['date'];
                $bookings[] = $row['total_bookings'];
                $revenues[] = $row['total_revenue'];
            }
        }

        $chartData = array(
            'dates' => $dates,
            'bookings' => $bookings,
            'revenues' => $revenues
        );
        


        return $chartData;
    }
}
