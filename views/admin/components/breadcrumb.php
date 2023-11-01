<?php
// Chức năng để phân tích URL thành mảng các phần tử
function parseURL($url)
{
    $parsedURL = parse_url($url);
    $path = isset($parsedURL['path']) ? $parsedURL['path'] : '';
    $pathParts = explode('/', $path);
    $pathParts = array_filter($pathParts); // Loại bỏ phần tử rỗng

    return $pathParts;
}

// Chức năng để tạo breadcrumb từ mảng các phần tử đã phân tích
function generateBreadcrumb($url)
{
    $pathParts = parseURL($url);
    $breadcrumb = ''; // Link gốc (trang chủ)

    $path = '';
    $count = count($pathParts); // Số lượng phần tử trong mảng
    $limit = ($count == 4) ? ($count - 2) : (($count == 3) ? ($count - 1) : $count); // Số phần tử sẽ được hiển thị (cắt số phần tử cuối cùng)

    $i = 0;
    foreach ($pathParts as $part) {
        $path .= '/' . $part;
        if ($part !== end($pathParts) && $i < $limit) { // Kiểm tra nếu phần tử không phải là phần tử cuối cùng của mảng và chưa đạt số phần tử được hiển thị

            $breadcrumb .= ' > <a href="' . $path . '">' . ucfirst($part) . '</a>'; // Tạo liên kết cho từng phần tử
            $i++;
        }
    }

    return $breadcrumb;
}

$url = $_SERVER['REQUEST_URI'];

$breadcrumb = generateBreadcrumb($url);

?>

<div class="my-2 ml-4 text-decoration-none text-bg-secondary">
    <?= $breadcrumb; ?>
</div>