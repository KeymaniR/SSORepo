<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="MainAppPage.aspx.cs" Inherits="SSOBase1.MainAppPage" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    
     <table>
            <tr>
                <td>
                    <asp:Label ID="lblMain" runat="server" Font-Bold="True" Font-Names="Broadway" 
                        Font-Size="X-Large">Main Application</asp:Label>
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Label ID="lblMessage" runat="server"></asp:Label>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="divLinks" runat="server"></div>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
