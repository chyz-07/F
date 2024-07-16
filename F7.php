<?php
    function isSymmetric($root) {
        if ($root === null) return true; // 如果樹的根節點是空的，那麼樹是對稱的
        return isMirror($root->left, $root->right); // 否則，判斷樹的左右子樹是否是鏡像的
    }

    function isMirror($left, $right) {
        if ($left === null && $right === null) return true; // 如果兩個子樹都是空的，那麼它們是鏡像的
        if ($left === null || $right === null) return false; // 如果其中一個子樹是空的，另一個不是，那麼它們不是鏡像的
        return ($left->val === $right->val) && // 檢查兩個子樹的根節點值是否相同
               isMirror($left->right, $right->left) && // 遞迴檢查左子樹的右子樹和右子樹的左子樹是否鏡像
               isMirror($left->left, $right->right); // 遞迴檢查左子樹的左子樹和右子樹的右子樹是否鏡像
    }    

    class TreeNode {
        public $val;
        public $left;
        public $right;
        public function __construct($val = 0, $left = null, $right = null) {
            $this->val = $val;
            $this->left = $left;
            $this->right = $right;
        }
    }

    function buildTree($array) {
        if (!$array) return null; // 如果數組為空，返回空樹
        $root = new TreeNode(array_shift($array)); // 用數組的第一個元素作為根節點
        $queue = [$root]; // 使用隊列來處理樹的層次遍歷
        while ($queue) {
            $node = array_shift($queue);
            if ($array) {
                $leftVal = array_shift($array); // 從數組中取出左子節點的值
                if ($leftVal !== null) {
                    $node->left = new TreeNode($leftVal); // 如果值不為空，創建左子節點
                    array_push($queue, $node->left); // 將左子節點加入隊列
                }
            }
            if ($array) {
                $rightVal = array_shift($array); // 從數組中取出右子節點的值
                if ($rightVal !== null) {
                    $node->right = new TreeNode($rightVal); // 如果值不為空，創建右子節點
                    array_push($queue, $node->right); // 將右子節點加入隊列
                }
            }
        }
        return $root; // 返回構建好的樹的根節點
    }

    echo "請輸入一個陣列 : \n";

    while (($line = readline()) !== false) {
        if (trim($line) === '') break; // 如果輸入空行，結束輸入
        $array = json_decode(trim($line)); // 將輸入的 JSON 字符串解析為 PHP 陣列
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "無效的輸入，請輸入有效的 JSON 陣列。\n";
            continue;
        }
        $tree = buildTree($array); // 根據輸入的數組構建二叉樹
        echo isSymmetric($tree) ? 'true' : 'false', "\n"; // 判斷樹是否對稱並輸出結果
    }
?>
