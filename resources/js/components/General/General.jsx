import React, { Component } from 'react';

class General extends Component {
    render() {
        return (
            <div className="under-section">
                <p className="under-title label-sim">Chính sách chung</p>
                <div className="under-block">
                    <p className="under-label">1. Chính sách thanh toán</p>
                    <div className="under-txt">
                        <p>- Thanh toán trực tiếp tiền mặt hoặc chuyển khoản, thẻ cào, quẹt thẻ,....</p>
                        <p>- Thanh toán sau khi nhận được sim vào thông tin chính chủ.</p>
                        <p>- Thông tin chi tiết về số tài khoản chúng tôi sẽ gửi trực tiếp cho quý khách.</p>
                        <p className="under-note"><span className="bold">Lưu ý:</span> Nội dung chuyển khoản ghi rõ nội dung chuyển khoản.</p>
                        <p>- Đối với khách hàng có nhu cầu mua sim số lượng lớn vui lòng liên hệ Quản lý để được giá tốt hơn theo quy định của công ty, việc thanh toán sẽ được thực hiện theo hợp đồng.</p>
                    </div>
                    <p className="under-label">2. Chính sách vận chuyển</p>
                    <div className="under-txt">
                        <p>Sau khi đặt hàng, tư vấn viên sẽ liên hệ xác nhận giao dịch. Chốt đơn hàng chúng tôi sẽ áp dụng hình thức vận chuyển ( Giao dịch ) sau:</p>
                        <p>- Giao dịch trực tiếp: Áp dụng sim trên 1 triệu, tùy theo mệnh gia sim sẽ hỗ trợ giao miễn phí cho quý khách trong thời gian tối đa 1 tiếng.</p>
                        <p>- Giao qua hình thức COD: Nhân viên sẽ chuyển cod qua bưu điện, sau 48 ~ 36 tiếng quý khách sẽ nhận đước sim.</p>
                    </div>
                    <p className="under-label">3. Chính sách đổi trả &amp; hoàn tiền</p>
                    <div className="under-txt">
                        <p>- Quý khách mua sim tại chợ sim 24h sẽ được đăng ký chính chủ theo quy định của bộ thông tin truyền thông và nhà mạng.</p>
                        <p>- Khi quý khách hàng nhận sim sẽ được nhân viên hướng dẫn kiễm tra đúng sim và vào chính chủ theo đúng thông tin khách hàng cung cấp.</p>
                        <p>- Trường hợp do nhầm lẫn giao không đúng sim đã đặt chúng tôi sẽ có trách nhiệm đổi lại đúng sim quý khách đặt mua.</p>
                        <p>- Khi đã mua sim thành công, nếu quý khách muốn đổi lại sim, quý khách thỏa thuận với công ty chúng tôi, nếu được sự đồng ý, chúng tôi sẽ cho đổi lại sim.</p>
                    </div>
                    <p className="under-label">4. Chính sách bảo hành</p>
                    <div className="under-txt">
                        <p>Chợ sim 24h cam kết sẽ trả lại 100% số tiền trong 1 ngày, nếu trong quá trình mua bán phát sinh các vấn đề sau:</p>
                        <p>- Không đúng sim mình đặt mua.</p>
                        <p>- Không được đăng kí thông tin.</p>
                        <p>- Phát sinh vấn đề tranh chấp, khiếu nại hoặc nguyên nhân từ phía chúng tôi.</p>
                        <p>- Khách hàng đã chuyển khoản, đặt cọc trước nhưng vì lý do sim đã bán hoặc không cung cấp được sim đặt mua.</p>
                    </div>
                    <p className="under-label">5. Hướng dẫn mua hàng</p>
                    <div className="under-txt">
                        <p>Quý Khách hàng có thể chọn một trong hai cách sau:</p>
                        <p><span className="bold">Cách thứ nhất:</span> Gọi điện trực tiếp đến hotline, tư vấn viên sẽ tư vấn trực tiếp cho quý khách.</p>
                        <p><span className="bold">Cách thứ hai:</span> Đặt hàng qua website - bấm vào nút “ Đặt mua” sau khi nhận đơn hàng, tư vấn viên sẽ liên hệ lại giao dịch).</p>
                    </div>
                </div>
            </div>
        );
    }
}

export default General;