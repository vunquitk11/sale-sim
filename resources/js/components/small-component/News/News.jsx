import React, { Component } from 'react';

class News extends Component {
    render() {
        return (
            <ul className="under-news">
                <li><a href="/news/xxx"><img src={require("../../../../../public/frontend/images/under_img.jpg")} /><span>Địa chỉ mua sim số đẹp tại TPHCM</span></a></li>
                <li><a href="/news/xxx"><img src={require("../../../../../public/frontend/images/under_img.jpg")} /><span>Địa chỉ mua sim số đẹp tại TPHCM</span></a></li>
                <li><a href="/news/xxx"><img src={require("../../../../../public/frontend/images/under_img.jpg")} /><span>Địa chỉ mua sim số đẹp tại TPHCM</span></a></li>
                <li><a href="/news/xxx"><img src={require("../../../../../public/frontend/images/under_img.jpg")} /><span>Địa chỉ mua sim số đẹp tại TPHCM</span></a></li>
            </ul>
        );
    }
}

export default News;