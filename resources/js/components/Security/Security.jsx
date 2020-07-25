import React, { Component } from 'react';

class Security extends Component {
    render() {
        return (
            <div className="under-section">
                <p className="under-title label-sim">Chính sách bảo mật</p>
                <div className="under-block">
                    <p className="under-label">1. Mục đích và phạm vi thu nhập</p>
                    <div className="under-txt">
                        <p>Trong quá trình giao dịch mua bán sim, giao dịch dịch vụ ( Cầm sim, sim trả góp, thuê sim, thu mua sim ) Tại Chợ sim 24h bắt buộc phải thu thập những thông tin bao gồm:</p>
                        <p>- Đặt hàng: Tên, địa chỉ, số điện thoại liên hệ.</p>
                        <p>- Thủ tục sang tên: chứng minh thư và chân dung.</p>
                        <p>- Dịch vụ: Chứng minh thư và chân dung, Thông tin,....</p>
                    </div>
                    <p className="under-label">2. Phạm vi và mục đích sử dụng thông tin</p>
                    <div className="under-txt">
                        <p>Chúng tôi sử dụng thông tin vào những mục đích sau:</p>
                        <p>- Lấy thông tin giao dịch mua bán sim.</p>
                        <p>- Làm thủ tục sang tên chính chủ sim, theo quy định của nhà mạng và bộ thông tin truyền thông.</p>
                        <p>- Lưu trữ thông tin dịch vụ ( cầm, trả góp, thuê sim...).</p>
                        <p>- Liên hệ, lại chăm sóc khách hàng sau bán.</p>
                        <p>- Thông báo trương trình khuyến mại, giảm giá...</p>
                    </div>
                    <p className="under-label">3. Thời gian lưu trữ thông tin</p>
                    <div className="under-txt">
                        <p>- Tùy theo mức độ thông tin liên quan, hoặc yêu cầu của khách hàng, chúng tôi sẽ lưu trữ trong thời gian nhất định. Chúng tôi sẽ lưu trữ trong thời gian làm việc Mua bán với khách hàng, sau khi không còn giao dịch, chúng tôi sẽ hủy thông tin trên hệ thống tự động (thường là 6 tháng).</p>
                    </div>
                    <p className="under-label">4. Cam kết bảo mật</p>
                    <div className="under-txt">
                        <p>- Chợ sim 24h thu thập thông tin khách hàng vào mục đích giao dịch mua bán sim và thu thập thông tin chứng minh thư, chân dung theo quy định của nhà mạng và bộ thông tin truyền thông. Chúng tôi cam kết sẽ đảm bảo bí mật thông tin 100%. Nếu làm sai, chúng tôi xin chịu trách nhiệm hoàn toàn với khách hàng.</p>
                        <p>- Nếu trong quá trình giao dịch quý khách phát hiện tư vấn viên, sử dụng thông tin vào mục đích khác xin vui lòng liên hệ Hotline: <span className="bold">0979 224 222</span> - Trương Nhất</p>
                    </div>
                </div>
            </div>
        );
    }
}

export default Security;