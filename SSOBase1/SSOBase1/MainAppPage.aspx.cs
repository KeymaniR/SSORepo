using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Web.Security;

namespace SSOBase1
{
    public partial class MainAppPage : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["UserId"] == null)                
                FormsAuthentication.RedirectToLoginPage();
            else
            {

                string _userId = Session["UserId"].ToString();
                lblMessage.Text = "Welcome " + _userId + " to Main Application.";
                Authenticator svc = new Authenticator(_userId);
                DataTable dtResult = svc.GetAppAccessDetails();
                foreach (DataRow dr in dtResult.Rows)
                {
                    HyperLink _hyperlink = new HyperLink();
                    _hyperlink.Text = dr["ApplicationName"].ToString();
                    _hyperlink.NavigateUrl = svc.AuthenticateClientUrl(dr["ApplicationURL"].ToString());
                    //_hyperlink.NavigateUrl = dr["ApplicationURL"].ToString() + "?UserId="+_userId+"&IsAuthenticatedBySSO=1";
                    divLinks.Controls.Add(_hyperlink);
                    divLinks.Controls.Add(new LiteralControl("<BR>"));
                }
            }
        }
    }
}