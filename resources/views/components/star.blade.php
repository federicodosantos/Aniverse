<?php
    // Fungsi untuk membuat ikon bintang
    function createStar($filled) {
        if ($filled) {
            return '
            <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.049 2.927C9.301 2.006 10.699 2.006 10.951 2.927l1.197 4.58a1 1 0 00.95.691h4.837c1.054 0 1.493 1.338.638 1.937l-3.896 2.686a1 1 0 00-.364 1.118l1.197 4.58c.252.921-.757 1.688-1.54 1.118l-3.896-2.686a1 1 0 00-1.176 0l-3.896 2.686c-.783.57-1.792-.197-1.54-1.118l1.197-4.58a1 1 0 00-.364-1.118L2.326 10.135c-.855-.599-.416-1.937.638-1.937h4.837a1 1 0 00.95-.691L9.049 2.927z"></path>
            </svg>';
        } else {
            return '
            <svg class="w-6 h-6 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.049 2.927C9.301 2.006 10.699 2.006 10.951 2.927l1.197 4.58a1 1 0 00.95.691h4.837c1.054 0 1.493 1.338.638 1.937l-3.896 2.686a1 1 0 00-.364 1.118l1.197 4.58c.252.921-.757 1.688-1.54 1.118l-3.896-2.686a1 1 0 00-1.176 0l-3.896 2.686c-.783.57-1.792-.197-1.54-1.118l1.197-4.58a1 1 0 00-.364-1.118L2.326 10.135c-.855-.599-.416-1.937.638-1.937h4.837a1 1 0 00.95-.691L9.049 2.927z"></path>
            </svg>';
        }
    }

    // Jumlah bintang yang terisi
    $rating = 3;

    echo '<div class="flex space-x-1">';
    for ($i = 1; $i <= 5; $i++) {
        echo createStar($i <= $rating);
    }
    echo '</div>';
    ?>