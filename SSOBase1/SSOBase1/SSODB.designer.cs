﻿#pragma warning disable 1591
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.239
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace SSOBase1
{
	using System.Data.Linq;
	using System.Data.Linq.Mapping;
	using System.Data;
	using System.Collections.Generic;
	using System.Reflection;
	using System.Linq;
	using System.Linq.Expressions;
	using System.ComponentModel;
	using System;
	
	
	[global::System.Data.Linq.Mapping.DatabaseAttribute(Name="SSOSampleDB")]
	public partial class SSODBDataContext : System.Data.Linq.DataContext
	{
		
		private static System.Data.Linq.Mapping.MappingSource mappingSource = new AttributeMappingSource();
		
    #region Extensibility Method Definitions
    partial void OnCreated();
    #endregion
		
		public SSODBDataContext() : 
				base(global::System.Configuration.ConfigurationManager.ConnectionStrings["SSOSampleDBConnectionString"].ConnectionString, mappingSource)
		{
			OnCreated();
		}
		
		public SSODBDataContext(string connection) : 
				base(connection, mappingSource)
		{
			OnCreated();
		}
		
		public SSODBDataContext(System.Data.IDbConnection connection) : 
				base(connection, mappingSource)
		{
			OnCreated();
		}
		
		public SSODBDataContext(string connection, System.Data.Linq.Mapping.MappingSource mappingSource) : 
				base(connection, mappingSource)
		{
			OnCreated();
		}
		
		public SSODBDataContext(System.Data.IDbConnection connection, System.Data.Linq.Mapping.MappingSource mappingSource) : 
				base(connection, mappingSource)
		{
			OnCreated();
		}
		
		public System.Data.Linq.Table<MainAppCredential> MainAppCredentials
		{
			get
			{
				return this.GetTable<MainAppCredential>();
			}
		}
		
		public System.Data.Linq.Table<App> Apps
		{
			get
			{
				return this.GetTable<App>();
			}
		}
		
		public System.Data.Linq.Table<UserAppMap> UserAppMaps
		{
			get
			{
				return this.GetTable<UserAppMap>();
			}
		}
	}
	
	[global::System.Data.Linq.Mapping.TableAttribute(Name="dbo.MainAppCredential")]
	public partial class MainAppCredential
	{
		
		private string _Userid;
		
		private string _Password;
		
		public MainAppCredential()
		{
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_Userid", DbType="NVarChar(100) NOT NULL", CanBeNull=false)]
		public string Userid
		{
			get
			{
				return this._Userid;
			}
			set
			{
				if ((this._Userid != value))
				{
					this._Userid = value;
				}
			}
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_Password", DbType="NVarChar(300) NOT NULL", CanBeNull=false)]
		public string Password
		{
			get
			{
				return this._Password;
			}
			set
			{
				if ((this._Password != value))
				{
					this._Password = value;
				}
			}
		}
	}
	
	[global::System.Data.Linq.Mapping.TableAttribute(Name="dbo.App")]
	public partial class App
	{
		
		private int _AppId;
		
		private string _AppName;
		
		private string _AppUrl;
		
		public App()
		{
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_AppId", DbType="Int NOT NULL")]
		public int AppId
		{
			get
			{
				return this._AppId;
			}
			set
			{
				if ((this._AppId != value))
				{
					this._AppId = value;
				}
			}
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_AppName", DbType="NVarChar(100) NOT NULL", CanBeNull=false)]
		public string AppName
		{
			get
			{
				return this._AppName;
			}
			set
			{
				if ((this._AppName != value))
				{
					this._AppName = value;
				}
			}
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_AppUrl", DbType="NVarChar(3000) NOT NULL", CanBeNull=false)]
		public string AppUrl
		{
			get
			{
				return this._AppUrl;
			}
			set
			{
				if ((this._AppUrl != value))
				{
					this._AppUrl = value;
				}
			}
		}
	}
	
	[global::System.Data.Linq.Mapping.TableAttribute(Name="dbo.UserAppMap")]
	public partial class UserAppMap
	{
		
		private int _AppId;
		
		private string _MUserId;
		
		public UserAppMap()
		{
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_AppId", DbType="Int NOT NULL")]
		public int AppId
		{
			get
			{
				return this._AppId;
			}
			set
			{
				if ((this._AppId != value))
				{
					this._AppId = value;
				}
			}
		}
		
		[global::System.Data.Linq.Mapping.ColumnAttribute(Storage="_MUserId", DbType="NVarChar(100) NOT NULL", CanBeNull=false)]
		public string MUserId
		{
			get
			{
				return this._MUserId;
			}
			set
			{
				if ((this._MUserId != value))
				{
					this._MUserId = value;
				}
			}
		}
	}
}
#pragma warning restore 1591
