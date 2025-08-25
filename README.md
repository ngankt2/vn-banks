# Bộ Dữ Liệu Ngân Hàng Việt Nam (Cập nhật Tháng 8/2025)

Kho lưu trữ này cung cấp bộ dữ liệu toàn diện về các ngân hàng Việt Nam, được cập nhật tính đến tháng 8/2025. Bộ dữ liệu bao gồm:

- [x] **Danh sách 43 ngân hàng và loại thẻ** với tên gọi chính thức, mã số và các thuộc tính liên quan.
- [x] **Định dạng dữ liệu**: SQL, JSON và migration của Laravel.

Dữ liệu bao gồm các ngân hàng lớn tại Việt Nam và các loại thẻ quốc tế (ví dụ: Visa, MasterCard) với các thông tin như mã ngân hàng, mã BIN ATM, độ dài thẻ và mã SWIFT, phù hợp với tiêu chuẩn hệ thống ngân hàng Việt Nam.

## Cấu Trúc Dữ Liệu

### Ngân Hàng
- **Tên Bảng**: `vn_banks`
- **Các Trường**:
  - `id`: Định danh duy nhất (tự động tăng).
  - `name`: Tên chính thức của ngân hàng hoặc loại thẻ (ví dụ: Ngân hàng Á Châu, Visa).
  - `bank_id`: Mã định danh ngân hàng duy nhất (ví dụ: 970416 cho ACB).
  - `atm_bin`: Mã BIN ATM (ví dụ: 970416 cho ACB).
  - `card_length`: Độ dài số thẻ (ví dụ: 16, 0 nếu không áp dụng).
  - `short_name`: Tên viết tắt hoặc bí danh (ví dụ: ACB, Vietcombank).
  - `bank_code`: Mã ngân hàng (ví dụ: 307 cho ACB).
  - `type`: Loại mục (ví dụ: ACC cho ngân hàng, rỗng cho loại thẻ như Visa).
  - `swift_code`: Mã SWIFT cho giao dịch quốc tế (có thể null, ví dụ: ASCBVNVX cho ACB).
  - `created_at`: Thời gian tạo bản ghi.
  - `updated_at`: Thời gian cập nhật bản ghi.

## Tệp Được Bao Gồm
- `vn-bank.sql`: Tệp SQL để tạo bảng `vn_banks` và chèn dữ liệu.
- `vn_banks.json`: Tệp JSON chứa dữ liệu cho mục đích sử dụng lập trình.
- `create_vn_banks_table.php`: Tệp di cư Laravel để tạo bảng `vn_banks` và chèn dữ liệu từ `vn-bank.sql`.
- `VNBank.php`: Tệp mô hình Laravel để tương tác với bảng `vn_banks`.

## Cài Đặt
Gói này có thể được cài đặt thông qua Composer cho các ứng dụng Laravel.

**Composer**:
```bash
composer require ngankt2/vn-banks
```

Sau khi cài đặt, chạy lệnh di cư để tạo bảng và chèn dữ liệu:
```bash
php artisan migrate
```

Lưu ý: Tệp di cư sẽ tự động chèn dữ liệu từ `vn-bank.sql` nếu tệp này tồn tại trong thư mục di cư.

## Sử Dụng

### SQL
- Chạy `vn-bank.sql` trong cơ sở dữ liệu của bạn (ví dụ: MySQL) để tạo bảng và nhập dữ liệu.
- Ví dụ:
  ```bash
  mysql -u username -p database_name < vn-bank.sql
  ```

### JSON
- Sử dụng `vn_banks.json` cho các ứng dụng cần dữ liệu JSON.
- Ví dụ (PHP):
  ```php
  $banks = json_decode(file_get_contents('vn_banks.json'), true);
  ```

### Laravel
- **Di cư**: Tệp `create_vn_banks_table.php` tạo bảng `vn_banks` với các tên cột theo chuẩn snake_case và chèn dữ liệu từ `vn-bank.sql`.
- **Mô hình**: Tệp `VNBank.php` cho phép tương tác với bảng `vn_banks` (ví dụ: `VNBank::where('bank_id', '970416')->first()`).

### Filament Panel
Nếu sử dụng Filament, bạn có thể tích hợp bộ dữ liệu vào bảng điều khiển quản trị:
```php
->plugin(FilamentVnBankPlugin::make())
```

## Giấy Phép
Bộ dữ liệu này được cung cấp theo Giấy phép MIT. Bạn có thể tự do sử dụng, chỉnh sửa và phân phối cho mục đích thương mại và phi thương mại, với điều kiện ghi công cho kho lưu trữ này.

## Đóng Góp
Chúng tôi hoan nghênh mọi đóng góp! Vui lòng gửi yêu cầu kéo (pull request) với các cập nhật hoặc sửa chữa cho bộ dữ liệu hoặc mã nguồn.

## Liên Hệ
Nếu có câu hỏi hoặc phản hồi, vui lòng mở một vấn đề (issue) trên kho lưu trữ này.