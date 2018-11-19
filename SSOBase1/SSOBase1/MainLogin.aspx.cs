using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Security;

namespace SSOBase1
{
    public partial class MainLogin : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }  

        protected void LoginControl_Authenticate1(object sender, AuthenticateEventArgs e)
        {
            Authenticator SSOSvc = new Authenticator(LoginControl.UserName);

            if (SSOSvc.AuthenticateUser(LoginControl.Password))
            {
                Session["UserId"] = LoginControl.UserName;                
                String returnUrl1 = "~/MainAppPage.aspx";
                Response.Redirect(returnUrl1);

            }
        }
    }
}