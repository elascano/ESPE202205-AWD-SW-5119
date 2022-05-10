import React from "react";

import HomepageHeader from './components/homepage/HomepageHeader';
import HomepageFooter from './components/homepage/HomepageFooter';
import Formu from "./components/New/Formu";

function Blog(){
    return(
        <div>
            <HomepageHeader />
            <div className="blog__container">
            <Formu/>
            </div>
            <HomepageFooter />
        </div>
    );
}

export default Blog;