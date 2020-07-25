import React, { Component } from 'react';
import { Redirect } from 'react-router-dom';
import Data from '../../views/Json/Data.json';
class SimInformation extends Component {
    render() {
        const simProfile = () => {
            if (parseInt(this.props.match.params.simID, 10) == this.props.match.params.simID) {
                let elementInfo = Data.find(element => element.simNumber === this.props.match.params.simID);
                if (!elementInfo) {
                    return 'Khong co sim'
                }
                var demo = "truongnhat";
                return <div className="sim-information">
                    <div className="container">
                        <div className="row">
                            <div className="col-6">
                                <p className="sim-number"><span className="label">Số sim:</span><span>{elementInfo.simNumber}</span></p>
                                <p className="sim-price"><span className="label">Giá bán:</span><span>{elementInfo.price} đ</span></p>
                                <p className="sim-product"><span className="label">Loại sim:</span><span>{elementInfo.product}</span></p>
                                <p className={elementInfo.category + " sim-cate"}><span className="label">Mạng:</span><span></span></p>
                                {/* <p className="sim-image"><img src={elementInfo.path} alt={elementInfo.simNumber} /></p> */}
                                <p><i>Giao hàng miễn phí toàn quốc!</i></p>
                            </div>
                            <div className="col-6">
                                <p className="promotion-title">{(elementInfo.promotion)?"Khuyến mãi":null}</p>
                                <div className="promotion-content">{
                                    (elementInfo.promotion)?(elementInfo.promotion.text.map((element) => <p>{element + "."}</p>)):null
                                }</div>
                            </div>
                        </div>
                        <button>Thêm vào giỏ hàng</button>
                    </div>
                </div>
            } else {
                return <Redirect to="/404-notfound" />;
            }
        }
        return (
            <div>
                {simProfile()}
            </div>
        );
    }
}

export default SimInformation;