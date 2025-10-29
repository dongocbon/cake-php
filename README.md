--------------
## Hoc cake php
--------------
## các lệnh cơ bản trong cake php
- Kiểm tra phiên bản CakePHP: bin/cake version
- Kiểm tra cấu hình DB: bin/cake schema_cache clear hoặc bin/cake schema_cache build
- Gỡ cache (tmp/): bin/cake cache clear_all
- Debug router: bin/cake routes
- Debug plugin: bin/cake plugin
- Sinh toàn bộ CRUD cho 1 bảng: bin/cake bake all Users
- start serve : bin/cake server
## tao migration
- bin/cake bake migration CreateUsers name:string email:string created modified
- run : bin/cake migrations migrate
- back: bin/cake migrations rollback
- seed: bin/cake bake seed UsersSeed
- run seed: bin/cake migrations seed
# cài plugin
composer require cakephp/authentication
bin/cake plugin load Authentication

nhúng vào Application.php
$this->addPlugin('Authentication');
# tao controller
bin/cake bake controller Auth
# tao model
bin/cake bake model Users
# tao template
bin/cake bake template Auth
# cấu hình authentication trong controller
use Authentication\Controller\Component\AuthenticationComponent;


# behavor
Tính năng                   	Behavior có thể làm
Tự động set created, modified	✅ TimestampBehavior
Tự động tạo slug	            ✅ SluggableBehavior
Soft Delete	                    ✅ Custom hoặc plugin
Tự động log dữ liệu         	✅ Custom behavior
Dùng lại logic giữa nhiều model	✅ Rất hiệu quả
