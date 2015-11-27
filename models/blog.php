<?php
    class Blog {
        // DB内のblogsテーブルとのデータのやりとりを担当するファイル
        // echo "blog model file";

        // modelファイルは単に最適なsql文を返すファイル
        
        // privateなプロパティを定義
        private $plural_resource = '';

        public function __construct($plural_resource) {
            $this->plural_resource = $plural_resource;
        }

        public function findAll($id = null,$search_text=null) {
            // データを取得する (model)
            if(empty($id)) {
            $sql = 'SELECT * FROM ' . $this->plural_resource;

            if (!empty($search_text)) {
                 $sql = 'SELECT * FROM ' . $this->plural_resource. ' WHERE title LIKE \'%'.$search_text.'%\'';
            }

            }else{
            $sql = 'SELECT * FROM ' . $this->plural_resource.' WHERE category_id='.$id;
            }   
            return $sql;
        }

            //var_dump($sql);
        public function findById($id) {
            $sql = sprintf('SELECT * FROM %s WHERE id=%s',
              $this->plural_resource,
              $id
            );

            return $sql;
        }

        public function create($blog) {
            $sql = sprintf('INSERT INTO %s SET category_id=%d, title="%s", body="%s", created=NOW()',
                $this->plural_resource,
                $blog['category_id'],
                $blog['title'],
                $blog['body']
            );

            return $sql;
        }

        public function update($blog) {
            $sql = sprintf('UPDATE %s SET category_id=%d, title="%s", body="%s", modified=NOW() WHERE id=%s',
                $this->plural_resource,
                $blog['category_id'],
                $blog['title'],
                $blog['body'],
                $blog['id']
            );

            return $sql;
        }

        
        public function destroy($id) {
            $sql = sprintf('DELETE FROM %s WHERE id=%s',
                $this->plural_resource,
                $id
            );

            return $sql;
        }
    }
?>
















