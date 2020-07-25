import React, { Component } from 'react';

class Repay extends Component {
    render() {
        return (
            <div className="under-section">
                <p className="under-title label-sim">Chính sách hoàn trả và hoàn lại tiền mua sim</p>
                <div className="under-block">
                    <p className="under-label">1. Chính sách đổi hàng</p>
                    <div className="under-txt">
                        <p>- Quý khách mua sim sẽ được đăng ký chính chủ theo quy định của bộ thông tin truyền thông và nhà mạng.</p>
                        <p>- Khi quý khách hàng nhận sim sẽ được nhân viên hướng dẫn kiễm tra đúng số, đúng thông tin theo khách hàng cung cấp.</p>
                        <p>- Trường hợp do nhầm lẫn giao không đúng số sim chúng tôi sẽ có trách nhiệm đổi lại đúng sim quý khách đặt mua</p>
                        <p>- Khi đã mua sim thành công, nếu quý khách muốn đổi lại sim, quý khách thỏa thuận với công ty chúng tôi, nếu được sự đồng ý, chúng tôi sẽ cho đổi lại sim.</p>
                        <p>- Hướng dẫn đăng ký chính chủ <a href="/register" className="bold">Tại đây</a></p>
                    </div>
                    <p className="under-label">2. Trả lại hàng</p>
                    <div className="under-txt">
                        <p>Chúng tôi cam kết sẽ trả lại 100% số tiền trong 1 ngày, nếu trong quá trình mua bán phát sinh các vấn đề sau:</p>
                        <p>- Không đúng sim mình đặt mua.</p>
                        <p>- Không đăng ký được thông tin chính chủ.</p>
                        <p>- Phát sinh vấn đề tranh chấp, khiếu nại hoặc nguyên nhân từ phía chúng tôi.</p>
                        <p>- Khách hàng đã chuyển khoản, đặt cọc trước nhưng vì lý do sim đã bán hoặc không cung cấp được sim đặt mua.</p>
                    </div>
                </div>
            </div>
        );
    }
}

export default Repay;