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

# tao command
bin/cake bake command MyJob

## Docker (Nginx + PHP-FPM + MySQL + MailHog)

### Dịch vụ
- Web (Nginx): expose 8080 -> truy cập http://localhost:8080
- PHP-FPM (app): chạy mã nguồn CakePHP
- MySQL: expose 33070 -> kết nối từ ngoài: host=localhost port=33070
- MailHog: UI http://localhost:8025, SMTP port 1025

### Cài và chạy
1. Tạo file `.env` tại project root (tham khảo các biến trong `config/app_local.php`):
   - DB_HOST=db, DB_PORT=3306, DB_DATABASE=my_app, DB_USERNAME=app, DB_PASSWORD=app
   - MAIL_HOST=mailhog, MAIL_PORT=1025
2. Build và chạy:
   ```bash
   docker compose up -d --build
   ```
3. Truy cập:
   - App: http://localhost:8080
   - MailHog: http://localhost:8025
   - MySQL (từ máy host): 127.0.0.1:33070

Ghi chú: `config/app_local.php` đã dùng biến môi trường để kết nối DB và SMTP.
