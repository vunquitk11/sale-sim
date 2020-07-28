import React, {useState,useEffect} from 'react';

const Footer = () => {
    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
    return (
        <footer id="footer">
            <div className="container">
                <div className="foo-content">
                    <div className="row">
                        <div className="col-xl-4">
                            <div className="foo-info">
                                <p className="foo-logo"><a href="/"><img src='/images/footer_logo.png'/></a></p>
                                <p className="foo-add">214 Võ Văn Ngân - Phường Bình Thọ - Quận Thủ Đức - TP. Hồ Chí Minh.</p>
                                <p className="foo-tel">0979 225 443</p>
                                <p className="foo-contact"><a href="/contact">Liên hệ với chúng tôi</a></p>
                            </div>
                        </div>
                        <div className="col-xl-3">
                            <p className="foo-title">Chính sách</p>
                            <ul className="foo-list">
                                <li><a href="/general">Chính sách chung</a></li>
                                <li><a href="/security">Chính sách bảo mật</a></li>
                                <li><a href="/repay">Chính sách đổi trả</a></li>
                                <li><a href="/condition">Điều khoản &amp; Điều kiện</a></li>
                                <li><a href="/juridical">Giấy tờ pháp lý</a></li>
                            </ul>
                        </div>
                        <div className="col-xl-3">
                            <p className="foo-title">Hỗ trợ</p>
                            <ul className="foo-list">
                                <li><a href="/guideline">Hỗ trợ mua sim</a></li>
                                <li><a href="/register">Đăng ký thông tin</a></li>
                                <li><a href="/pawn">Thủ tục cầm sim</a></li>
                                <li><a href="/installment">Thủ tục trả góp</a></li>
                                <li><a href="/procedure">Thủ tục mua sim số đẹp</a></li>
                            </ul>
                        </div>
                        <div className="col-xl-2">
                            <p className="foo-title">Chứng nhận</p>
                            <div className="foo-img">
                                <p><a href="http://online.gov.vn/" target="blank"><img src='/images/footer_img01.png'/></a></p>
                                <p><a href="http://online.gov.vn/" target="blank"><img src='/images/footer_img02.png'/></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p id="totop" onClick={() => scrollToTop()}><img src='/images/totop.png' alt="to top" /></p>
            <p className="copyright">Copyright &copy; GROUP CODE 4.0 All Rights Reserved.</p>
        </footer>
    );
}

export default Footer;

//Footer cua Nhat
 
// class Footer extends Component {
//     constructor(props) {
//         super(props);
//         this.state = {
//           is_visible: false
//         };
//     }
//     componentDidMount() {
//         let scrollComponent = this;
//         document.addEventListener("scroll", function(e) {
//             scrollComponent.toggleVisibility();
//         });
//         scrollComponent.scrollToTop();

//     }
//     toggleVisibility() {
//         if (window.pageYOffset > 100) {
//           this.setState({
//             is_visible: true
//           });
//         } else {
//           this.setState({
//             is_visible: false
//           });
//         }
//     }
//     scrollToTop() {
//         window.scrollTo({
//             top: 0,
//             behavior: "smooth"
//         });
//     }
//     render() {
//         // console.log('VISIBLE',is_visible);
//         const { is_visible } = this.state;
//         return (
//             <footer id="footer">
//                 <div className="container">
//                     <div className="foo-content">
//                         <div className="row">
//                             <div className="col-xl-4">
//                                 <div className="foo-info">
//                                     <p className="foo-logo"><a href="/"><img src='/images/footer_logo.png'/></a></p>
//                                     <p className="foo-add">214 Võ Văn Ngân - Phường Bình Thọ - Quận Thủ Đức - TP. Hồ Chí Minh.</p>
//                                     <p className="foo-tel">0979 225 443</p>
//                                     <p className="foo-contact"><a href="/contact">Liên hệ với chúng tôi</a></p>
//                                 </div>
//                             </div>
//                             <div className="col-xl-3">
//                                 <p className="foo-title">Chính sách</p>
//                                 <ul className="foo-list">
//                                     <li><a href="/general">Chính sách chung</a></li>
//                                     <li><a href="/security">Chính sách bảo mật</a></li>
//                                     <li><a href="/repay">Chính sách đổi trả</a></li>
//                                     <li><a href="/condition">Điều khoản &amp; Điều kiện</a></li>
//                                     <li><a href="/juridical">Giấy tờ pháp lý</a></li>
//                                 </ul>
//                             </div>
//                             <div className="col-xl-3">
//                                 <p className="foo-title">Hỗ trợ</p>
//                                 <ul className="foo-list">
//                                     <li><a href="/guideline">Hỗ trợ mua sim</a></li>
//                                     <li><a href="/register">Đăng ký thông tin</a></li>
//                                     <li><a href="/pawn">Thủ tục cầm sim</a></li>
//                                     <li><a href="/installment">Thủ tục trả góp</a></li>
//                                     <li><a href="/procedure">Thủ tục mua sim số đẹp</a></li>
//                                 </ul>
//                             </div>
//                             <div className="col-xl-2">
//                                 <p className="foo-title">Chứng nhận</p>
//                                 <div className="foo-img">
//                                     <p><a href="http://online.gov.vn/" target="blank"><img src='/images/footer_img01.png'/></a></p>
//                                     <p><a href="http://online.gov.vn/" target="blank"><img src='/images/footer_img02.png'/></a></p>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//                 <p id="totop" onClick={() => this.scrollToTop()} className={is_visible && ("show")}><img src='/images/totop.png' alt="to top" /></p>
//                 <p className="copyright">Copyright &copy; GROUP CODE 4.0 All Rights Reserved.</p>
//             </footer>
//         );
//     }
// }

// export default Footer;